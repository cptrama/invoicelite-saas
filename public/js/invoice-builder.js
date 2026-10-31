/**
 * InvoiceLite — Dynamic Invoice Builder Engine
 * Author: Fikri Nabillah (Feature & Analytics Lead)
 * Role: Anggota 3 - Feature & Analytics Lead
 */

const InvoiceEngine = (function () {
    // Storage Key for Local Invoices
    const STORAGE_KEY = 'invoicelite_invoices_data';
    const CLIENTS_STORAGE_KEY = 'invoicelite_clients_data';

    // Default Demo Data if storage is empty (ensures instant demo capability)
    const DEFAULT_INVOICES = [
        {
            id: 'INV-202610-001',
            invoice_number: 'INV/2026/10/001',
            client_name: 'PT Digital Solusindo',
            client_email: 'finance@digitalsolusindo.co.id',
            client_address: 'Jl. Sudirman Kav 25, Jakarta Selatan',
            issue_date: '2026-10-15',
            due_date: '2026-10-30',
            status: 'paid',
            currency: 'IDR',
            items: [
                { description: 'Pengembangan Website E-Commerce Custom', qty: 1, unit_price: 15000000, subtotal: 15000000 },
                { description: 'Integrasi Payment Gateway & Xendit Webhook', qty: 1, unit_price: 3500000, subtotal: 3500000 },
                { description: 'Optimasi SEO On-Page & Performance Speed', qty: 1, unit_price: 2000000, subtotal: 2000000 }
            ],
            subtotal: 20500000,
            discount_type: 'percent',
            discount_value: 5,
            discount_amount: 1025000,
            tax_rate: 11,
            tax_amount: 2142250,
            total_amount: 21617250,
            notes: 'Terima kasih atas kerja sama Anda. Pembayaran lunas.',
            payment_info: 'BCA: 8730-192-881 a/n InvoiceLite Studio'
        },
        {
            id: 'INV-202610-002',
            invoice_number: 'INV/2026/10/002',
            client_name: 'Creative Media Nusantara',
            client_email: 'billing@creativemedia.id',
            client_address: 'Gedung Cyber 2 Lantai 8, Jakarta',
            issue_date: '2026-10-20',
            due_date: '2026-11-05',
            status: 'unpaid',
            currency: 'IDR',
            items: [
                { description: 'Desain Branding & UI/UX Mobile App Figma', qty: 1, unit_price: 8500000, subtotal: 8500000 },
                { description: 'Design System & Token Assets Export', qty: 1, unit_price: 2500000, subtotal: 2500000 }
            ],
            subtotal: 11000000,
            discount_type: 'nominal',
            discount_value: 500000,
            discount_amount: 500000,
            tax_rate: 11,
            tax_amount: 1155000,
            total_amount: 11655000,
            notes: 'Harap selesaikan pembayaran sebelum tanggal jatuh tempo.',
            payment_info: 'Mandiri: 137-00-1928-3310 a/n InvoiceLite Studio'
        },
        {
            id: 'INV-202610-003',
            invoice_number: 'INV/2026/10/003',
            client_name: 'Kopi Kenangan Senja (UMKM)',
            client_email: 'owner@kenangansenja.com',
            client_address: 'Jl. Riau No. 45, Bandung',
            issue_date: '2026-09-20',
            due_date: '2026-10-05',
            status: 'overdue',
            currency: 'IDR',
            items: [
                { description: 'Social Media Management (1 Bulan / 15 Post)', qty: 1, unit_price: 4500000, subtotal: 4500000 },
                { description: 'Sponsor Ads Meta Campaign Setup', qty: 1, unit_price: 1500000, subtotal: 1500000 }
            ],
            subtotal: 6000000,
            discount_type: 'percent',
            discount_value: 0,
            discount_amount: 0,
            tax_rate: 0,
            tax_amount: 0,
            total_amount: 6000000,
            notes: 'Tagihan telah melewati batas jatuh tempo. Mohon segera diproses.',
            payment_info: 'BCA: 8730-192-881 a/n InvoiceLite Studio'
        },
        {
            id: 'INV-202610-004',
            invoice_number: 'INV/2026/10/004',
            client_name: 'Studio Foto Lumina',
            client_email: 'lumina.studio@gmail.com',
            client_address: 'Jl. Kaliurang KM 5, Yogyakarta',
            issue_date: '2026-10-28',
            due_date: '2026-11-12',
            status: 'draft',
            currency: 'IDR',
            items: [
                { description: 'Setup Cloud Hosting & Backup Otomatis', qty: 1, unit_price: 3200000, subtotal: 3200000 }
            ],
            subtotal: 3200000,
            discount_type: 'percent',
            discount_value: 0,
            discount_amount: 0,
            tax_rate: 11,
            tax_amount: 352000,
            total_amount: 3552000,
            notes: 'Draft invoice untuk peninjauan.',
            payment_info: 'BCA: 8730-192-881 a/n InvoiceLite Studio'
        }
    ];

    // Initialize Local Data
    function getStoredInvoices() {
        try {
            const data = localStorage.getItem(STORAGE_KEY);
            if (!data) {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(DEFAULT_INVOICES));
                return DEFAULT_INVOICES;
            }
            return JSON.parse(data);
        } catch (e) {
            console.warn('Error reading from localStorage:', e);
            return DEFAULT_INVOICES;
        }
    }

    function saveInvoices(invoices) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(invoices));
        } catch (e) {
            console.error('Error saving to localStorage:', e);
        }
    }

    // Number & Currency Formatters
    function formatCurrency(amount, currency = 'IDR') {
        const num = parseFloat(amount) || 0;
        if (currency === 'USD') {
            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(num);
        }
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(num);
    }

    // Auto Invoice Number Generator (e.g. INV/2026/10/005)
    function generateInvoiceNumber() {
        const invoices = getStoredInvoices();
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const nextSeq = String(invoices.length + 1).padStart(3, '0');
        return `INV/${year}/${month}/${nextSeq}`;
    }

    // Dynamic Line Item Functions
    function addLineItem(tableBody, item = { description: '', qty: 1, price: 0 }) {
        if (!tableBody) return;
        const row = document.createElement('tr');
        row.className = 'line-item-row';
        row.innerHTML = `
            <td class="col-desc">
                <input type="text" class="form-control item-desc" placeholder="Nama produk / deskripsi jasa..." value="${item.description}" required>
            </td>
            <td class="col-qty">
                <input type="number" class="form-control item-qty" min="1" step="1" value="${item.qty || 1}">
            </td>
            <td class="col-price">
                <input type="number" class="form-control item-price" min="0" step="1000" placeholder="0" value="${item.price || 0}">
            </td>
            <td class="col-subtotal item-subtotal-display">
                Rp 0
            </td>
            <td class="col-action">
                <button type="button" class="btn-remove-row" title="Hapus Baris">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </button>
            </td>
        `;

        tableBody.appendChild(row);
        bindRowEvents(row);
        recalculateTotals();
    }

    function bindRowEvents(row) {
        const qtyInput = row.querySelector('.item-qty');
        const priceInput = row.querySelector('.item-price');
        const removeBtn = row.querySelector('.btn-remove-row');

        if (qtyInput) qtyInput.addEventListener('input', recalculateTotals);
        if (priceInput) priceInput.addEventListener('input', recalculateTotals);

        if (removeBtn) {
            removeBtn.addEventListener('click', function () {
                const allRows = document.querySelectorAll('.line-item-row');
                if (allRows.length <= 1) {
                    alert('Minimal harus memiliki satu baris item!');
                    return;
                }
                row.remove();
                recalculateTotals();
            });
        }
    }

    // Core Calculation Logic
    function recalculateTotals() {
        const rows = document.querySelectorAll('.line-item-row');
        let subtotal = 0;
        const currencySelect = document.getElementById('invoice-currency');
        const currentCurrency = currencySelect ? currencySelect.value : 'IDR';

        rows.forEach(row => {
            const qty = parseFloat(row.querySelector('.item-qty')?.value) || 0;
            const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
            const lineSubtotal = qty * price;
            subtotal += lineSubtotal;

            const subtotalEl = row.querySelector('.item-subtotal-display');
            if (subtotalEl) {
                subtotalEl.textContent = formatCurrency(lineSubtotal, currentCurrency);
            }
        });

        // Discount
        const discountTypeEl = document.getElementById('discount-type');
        const discountValEl = document.getElementById('discount-val');
        const discountType = discountTypeEl ? discountTypeEl.value : 'percent';
        const discountInput = parseFloat(discountValEl?.value) || 0;
        let discountAmount = 0;

        if (discountType === 'percent') {
            discountAmount = (subtotal * discountInput) / 100;
        } else {
            discountAmount = discountInput;
        }
        discountAmount = Math.min(subtotal, Math.max(0, discountAmount));

        const afterDiscount = Math.max(0, subtotal - discountAmount);

        // Tax (PPN)
        const taxRateEl = document.getElementById('tax-rate');
        const taxRate = parseFloat(taxRateEl?.value) || 0;
        const taxAmount = (afterDiscount * taxRate) / 100;

        // Grand Total
        const grandTotal = afterDiscount + taxAmount;

        // Update Summary DOM
        const subtotalDisplay = document.getElementById('summary-subtotal');
        const discountDisplay = document.getElementById('summary-discount');
        const taxDisplay = document.getElementById('summary-tax');
        const totalDisplay = document.getElementById('summary-grand-total');

        if (subtotalDisplay) subtotalDisplay.textContent = formatCurrency(subtotal, currentCurrency);
        if (discountDisplay) discountDisplay.textContent = formatCurrency(discountAmount, currentCurrency);
        if (taxDisplay) taxDisplay.textContent = formatCurrency(taxAmount, currentCurrency);
        if (totalDisplay) totalDisplay.textContent = formatCurrency(grandTotal, currentCurrency);

        return {
            subtotal,
            discountAmount,
            taxAmount,
            grandTotal,
            currency: currentCurrency
        };
    }

    // Save or Update Invoice
    function saveInvoiceFromForm(statusOverride = null) {
        const form = document.getElementById('invoice-builder-form');
        if (!form) return null;

        const totals = recalculateTotals();
        const invoiceNum = document.getElementById('invoice-number')?.value || generateInvoiceNumber();
        const clientName = document.getElementById('client-name')?.value;
        const clientEmail = document.getElementById('client-email')?.value;
        const clientAddress = document.getElementById('client-address')?.value;
        const issueDate = document.getElementById('issue-date')?.value;
        const dueDate = document.getElementById('due-date')?.value;
        const status = statusOverride || document.getElementById('invoice-status')?.value || 'unpaid';
        const notes = document.getElementById('invoice-notes')?.value || '';
        const paymentInfo = document.getElementById('payment-info')?.value || '';
        const currency = document.getElementById('invoice-currency')?.value || 'IDR';

        if (!clientName || !issueDate || !dueDate) {
            alert('Harap lengkapi Nama Klien, Tanggal Terbit, dan Jatuh Tempo!');
            return null;
        }

        const items = [];
        document.querySelectorAll('.line-item-row').forEach(row => {
            const desc = row.querySelector('.item-desc')?.value || 'Layanan';
            const qty = parseFloat(row.querySelector('.item-qty')?.value) || 1;
            const price = parseFloat(row.querySelector('.item-price')?.value) || 0;
            items.push({
                description: desc,
                qty,
                unit_price: price,
                subtotal: qty * price
            });
        });

        const newInvoice = {
            id: invoiceNum.replace(/[^a-zA-Z0-9]/g, '-'),
            invoice_number: invoiceNum,
            client_name: clientName,
            client_email: clientEmail,
            client_address: clientAddress,
            issue_date: issueDate,
            due_date: dueDate,
            status: status,
            currency: currency,
            items: items,
            subtotal: totals.subtotal,
            discount_type: document.getElementById('discount-type')?.value || 'percent',
            discount_value: parseFloat(document.getElementById('discount-val')?.value) || 0,
            discount_amount: totals.discountAmount,
            tax_rate: parseFloat(document.getElementById('tax-rate')?.value) || 0,
            tax_amount: totals.taxAmount,
            total_amount: totals.grandTotal,
            notes: notes,
            payment_info: paymentInfo
        };

        const existing = getStoredInvoices();
        const index = existing.findIndex(inv => inv.invoice_number === invoiceNum);
        if (index >= 0) {
            existing[index] = newInvoice;
        } else {
            existing.unshift(newInvoice);
        }

        saveInvoices(existing);
        return newInvoice;
    }

    // Toggle Status Directly (e.g. from table Mark as Paid)
    function toggleInvoiceStatus(invoiceNumber, newStatus) {
        const invoices = getStoredInvoices();
        const inv = invoices.find(i => i.invoice_number === invoiceNumber);
        if (inv) {
            inv.status = newStatus;
            saveInvoices(invoices);
            return true;
        }
        return false;
    }

    function deleteInvoice(invoiceNumber) {
        let invoices = getStoredInvoices();
        invoices = invoices.filter(i => i.invoice_number !== invoiceNumber);
        saveInvoices(invoices);
        return invoices;
    }

    // Public API
    return {
        getInvoices: getStoredInvoices,
        saveInvoices: saveInvoices,
        generateInvoiceNumber: generateInvoiceNumber,
        formatCurrency: formatCurrency,
        addLineItem: addLineItem,
        recalculateTotals: recalculateTotals,
        saveInvoiceFromForm: saveInvoiceFromForm,
        toggleInvoiceStatus: toggleInvoiceStatus,
        deleteInvoice: deleteInvoice
    };
})();

// Auto bind on Invoice Builder Page load
document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('line-items-body');
    const addRowBtn = document.getElementById('btn-add-line-item');
    const invoiceNumInput = document.getElementById('invoice-number');
    const currencySelect = document.getElementById('invoice-currency');
    const discountType = document.getElementById('discount-type');
    const discountVal = document.getElementById('discount-val');
    const taxRate = document.getElementById('tax-rate');

    if (tableBody) {
        // Auto set invoice number if empty
        if (invoiceNumInput && !invoiceNumInput.value) {
            invoiceNumInput.value = InvoiceEngine.generateInvoiceNumber();
        }

        // Set default dates if empty
        const issueDateInput = document.getElementById('issue-date');
        const dueDateInput = document.getElementById('due-date');
        if (issueDateInput && !issueDateInput.value) {
            const today = new Date().toISOString().split('T')[0];
            issueDateInput.value = today;

            if (dueDateInput && !dueDateInput.value) {
                const next14 = new Date();
                next14.setDate(next14.getDate() + 14);
                dueDateInput.value = next14.toISOString().split('T')[0];
            }
        }

        // Add 2 initial rows if empty
        if (tableBody.children.length === 0) {
            InvoiceEngine.addLineItem(tableBody, { description: 'Jasa Desain Website UI/UX Responsive', qty: 1, price: 4500000 });
            InvoiceEngine.addLineItem(tableBody, { description: 'Slicing HTML5/CSS3 & Interaktivitas JavaScript', qty: 1, price: 3000000 });
        }

        if (addRowBtn) {
            addRowBtn.addEventListener('click', function () {
                InvoiceEngine.addLineItem(tableBody);
            });
        }

        [currencySelect, discountType, discountVal, taxRate].forEach(el => {
            if (el) el.addEventListener('input', InvoiceEngine.recalculateTotals);
        });

        // Save Form Buttons
        const btnSaveDraft = document.getElementById('btn-save-draft');
        const btnSavePreview = document.getElementById('btn-save-preview');

        if (btnSaveDraft) {
            btnSaveDraft.addEventListener('click', function (e) {
                e.preventDefault();
                const saved = InvoiceEngine.saveInvoiceFromForm('draft');
                if (saved) {
                    alert('Draft Invoice berhasil disimpan!');
                    window.location.href = 'index.php?page=invoices';
                }
            });
        }

        if (btnSavePreview) {
            btnSavePreview.addEventListener('click', function (e) {
                e.preventDefault();
                const saved = InvoiceEngine.saveInvoiceFromForm();
                if (saved) {
                    window.location.href = `index.php?page=invoice-preview&inv=${encodeURIComponent(saved.invoice_number)}`;
                }
            });
        }
    }
});
