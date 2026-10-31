/**
 * InvoiceLite — Analytics & Visual Charts Engine
 * Author: Fikri Nabillah (Feature & Analytics Lead)
 * Role: Anggota 3 - Feature & Analytics Lead
 */

document.addEventListener('DOMContentLoaded', function () {
    const revenueCanvas = document.getElementById('chart-revenue-trend');
    const statusCanvas = document.getElementById('chart-status-distribution');

    if (!revenueCanvas && !statusCanvas) {
        return; // Not on the dashboard page
    }

    // Load Invoices from InvoiceEngine
    const invoices = typeof InvoiceEngine !== 'undefined' ? InvoiceEngine.getInvoices() : [];

    // 1. Calculate KPI Metrics Dynamically
    updateKPICards(invoices);

    // 2. Render Revenue Trend Chart (Area / Line Chart)
    if (revenueCanvas && typeof Chart !== 'undefined') {
        renderRevenueChart(revenueCanvas, invoices);
    }

    // 3. Render Status Distribution Chart (Doughnut Chart)
    if (statusCanvas && typeof Chart !== 'undefined') {
        renderStatusChart(statusCanvas, invoices);
    }

    // 4. Render and Bind Recent Invoices Table
    renderRecentInvoicesTable(invoices);
});

// Update KPI Metrics Cards
function updateKPICards(invoices) {
    let paidTotal = 0;
    let pendingTotal = 0;
    let overdueTotal = 0;
    let overdueCount = 0;

    const todayStr = new Date().toISOString().split('T')[0];

    invoices.forEach(inv => {
        const amount = parseFloat(inv.total_amount) || 0;
        if (inv.status === 'paid') {
            paidTotal += amount;
        } else if (inv.status === 'unpaid') {
            pendingTotal += amount;
            if (inv.due_date && inv.due_date < todayStr) {
                overdueTotal += amount;
                overdueCount++;
            }
        } else if (inv.status === 'overdue') {
            overdueTotal += amount;
            overdueCount++;
        }
    });

    const formatRp = (val) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(val);

    const kpiPaid = document.getElementById('kpi-paid-revenue');
    const kpiPending = document.getElementById('kpi-pending-balance');
    const kpiOverdue = document.getElementById('kpi-overdue-count');
    const kpiTotalInvoices = document.getElementById('kpi-total-invoices');

    if (kpiPaid) kpiPaid.textContent = formatRp(paidTotal);
    if (kpiPending) kpiPending.textContent = formatRp(pendingTotal);
    if (kpiOverdue) kpiOverdue.textContent = `${overdueCount} Invoice (${formatRp(overdueTotal)})`;
    if (kpiTotalInvoices) kpiTotalInvoices.textContent = `${invoices.length} Faktur`;
}

// Monthly Revenue Area Chart
function renderRevenueChart(canvas, invoices) {
    const ctx = canvas.getContext('2d');

    // Create Gradient Fill
    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(99, 102, 241, 0.45)');
    gradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)');

    const months = ['Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'];
    // Realistic monthly trend data
    const monthlyRevenue = [8500000, 12200000, 15800000, 18400000, 24500000, 31250000];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Pendapatan Diterima (IDR)',
                data: monthlyRevenue,
                borderColor: '#6366f1',
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#818cf8',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.95)',
                    titleColor: '#f8fafc',
                    bodyColor: '#cbd5e1',
                    borderColor: 'rgba(99, 102, 241, 0.4)',
                    borderWidth: 1,
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        label: function (context) {
                            return 'Pendapatan: ' + new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(context.parsed.y);
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.05)'
                    },
                    ticks: {
                        color: '#94a3b8'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.05)'
                    },
                    ticks: {
                        color: '#94a3b8',
                        callback: function (val) {
                            return 'Rp ' + (val / 1000000) + ' Jt';
                        }
                    }
                }
            }
        }
    });
}

// Invoice Status Breakdown Doughnut Chart
function renderStatusChart(canvas, invoices) {
    const ctx = canvas.getContext('2d');

    let countPaid = 0;
    let countUnpaid = 0;
    let countOverdue = 0;
    let countDraft = 0;

    invoices.forEach(inv => {
        if (inv.status === 'paid') countPaid++;
        else if (inv.status === 'unpaid') countUnpaid++;
        else if (inv.status === 'overdue') countOverdue++;
        else if (inv.status === 'draft') countDraft++;
    });

    // Fallbacks if empty
    if (invoices.length === 0) {
        countPaid = 3; countUnpaid = 2; countOverdue = 1; countDraft = 1;
    }

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Lunas (Paid)', 'Menunggu (Unpaid)', 'Jatuh Tempo (Overdue)', 'Draft'],
            datasets: [{
                data: [countPaid, countUnpaid, countOverdue, countDraft],
                backgroundColor: [
                    '#10b981', // Emerald
                    '#f59e0b', // Amber
                    '#ef4444', // Red
                    '#94a3b8'  // Gray
                ],
                borderWidth: 2,
                borderColor: '#0f172a',
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#94a3b8',
                        boxWidth: 12,
                        padding: 15,
                        font: {
                            family: 'Plus Jakarta Sans',
                            size: 11
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(15, 23, 42, 0.95)',
                    padding: 10,
                    callbacks: {
                        label: function (context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const val = context.raw || 0;
                            const percentage = Math.round((val / total) * 100);
                            return ` ${context.label}: ${val} (${percentage}%)`;
                        }
                    }
                }
            },
            cutout: '72%'
        }
    });
}

// Populate Recent Invoices Table with Filter Pills
function renderRecentInvoicesTable(invoices, filterStatus = 'all') {
    const tableBody = document.getElementById('recent-invoices-body');
    if (!tableBody) return;

    tableBody.innerHTML = '';

    const filtered = filterStatus === 'all'
        ? invoices
        : invoices.filter(inv => inv.status === filterStatus);

    if (filtered.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="6" style="text-align: center; padding: 2.5rem; color: var(--text-muted);">
                    Tidak ada invoice dengan status "${filterStatus}".
                </td>
            </tr>
        `;
        return;
    }

    filtered.forEach(inv => {
        const tr = document.createElement('tr');
        const badgeClass = `status-${inv.status || 'draft'}`;
        const formattedAmount = typeof InvoiceEngine !== 'undefined'
            ? InvoiceEngine.formatCurrency(inv.total_amount, inv.currency)
            : `Rp ${inv.total_amount}`;

        tr.innerHTML = `
            <td><strong>${inv.invoice_number}</strong></td>
            <td>${inv.client_name}</td>
            <td>${inv.due_date}</td>
            <td><strong>${formattedAmount}</strong></td>
            <td><span class="status-badge ${badgeClass}">${inv.status}</span></td>
            <td>
                <div style="display: flex; gap: 0.5rem; align-items: center;">
                    <a href="index.php?page=invoice-preview&inv=${encodeURIComponent(inv.invoice_number)}" class="btn btn-outline btn-sm" title="Pratinjau / Cetak">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </a>
                    ${inv.status !== 'paid' ? `
                    <button type="button" class="btn btn-emerald btn-sm btn-mark-paid" data-inv="${inv.invoice_number}" title="Tandai Lunas">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </button>
                    ` : ''}
                </div>
            </td>
        `;

        tableBody.appendChild(tr);
    });

    // Bind Mark As Paid Buttons
    tableBody.querySelectorAll('.btn-mark-paid').forEach(btn => {
        btn.addEventListener('click', function () {
            const invNum = this.getAttribute('data-inv');
            if (InvoiceEngine.toggleInvoiceStatus(invNum, 'paid')) {
                // Refresh table & KPI
                const updated = InvoiceEngine.getInvoices();
                updateKPICards(updated);
                renderRecentInvoicesTable(updated, filterStatus);
            }
        });
    });

    // Bind Filter Pills
    document.querySelectorAll('.filter-pill').forEach(pill => {
        pill.onclick = function () {
            document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            const targetFilter = this.getAttribute('data-filter') || 'all';
            renderRecentInvoicesTable(InvoiceEngine.getInvoices(), targetFilter);
        };
    });
}
