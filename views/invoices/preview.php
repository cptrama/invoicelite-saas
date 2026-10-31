<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Preview & Cetak PDF — InvoiceLite SaaS</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/invoice.css">
    
    <style>
        /* Standalone preview container background */
        body {
            background-color: var(--bg-main);
            min-height: 100vh;
            padding-bottom: 3rem;
        }
    </style>
</head>
<body>

    <!-- Non-Printable Top Action Bar -->
    <div class="preview-actions-bar non-printable">
        <a href="index.php?page=dashboard" class="btn btn-outline btn-sm">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Kembali ke Dashboard
        </a>

        <div style="display: flex; gap: 0.75rem;">
            <a href="index.php?page=invoice-create" class="btn btn-secondary btn-sm">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Buat Faktur Baru
            </a>
            <button type="button" class="btn btn-primary btn-sm" onclick="window.print()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                    <rect x="6" y="14" width="12" height="8"></rect>
                </svg>
                Cetak / Simpan PDF (Ctrl+P)
            </button>
        </div>
    </div>

    <!-- Printable Official Invoice Container -->
    <div class="invoice-preview-container" id="printable-invoice">
        <!-- Invoice Header -->
        <div class="invoice-preview-header">
            <div>
                <div class="invoice-brand-title">InvoiceLite Studio</div>
                <div style="font-size:0.875rem; color:#64748b; margin-top:0.25rem;">
                    Solusi Pembuatan Invoice & Penagihan Digital UMKM<br>
                    support@invoicelite.id • +62 812-3456-7890
                </div>
            </div>

            <div class="invoice-meta-right">
                <div class="invoice-number-display" id="inv-display-number">INV/2026/10/001</div>
                <div style="margin-top:0.5rem;" id="inv-display-status">
                    <span class="status-badge status-unpaid">Menunggu Pembayaran</span>
                </div>
                <div class="invoice-dates">
                    <div>Terbit: <strong id="inv-display-issue-date">15 Okt 2026</strong></div>
                    <div>Jatuh Tempo: <strong id="inv-display-due-date">30 Okt 2026</strong></div>
                </div>
            </div>
        </div>

        <!-- Parties Section -->
        <div class="invoice-parties">
            <div class="party-block">
                <h4>Ditagihkan Oleh:</h4>
                <div class="party-name">InvoiceLite Studio</div>
                <div class="party-details">
                    Gedung Cyber One Lt. 5, Jakarta Selatan<br>
                    Indonesia, 12710<br>
                    NPWP: 09.876.543.2-012.000
                </div>
            </div>

            <div class="party-block">
                <h4>Ditagihkan Kepada:</h4>
                <div class="party-name" id="inv-display-client-name">PT Digital Solusindo</div>
                <div class="party-details" id="inv-display-client-details">
                    finance@digitalsolusindo.co.id<br>
                    Jl. Sudirman Kav 25, Jakarta Selatan
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <table class="invoice-preview-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 50%;">Deskripsi Layanan / Produk</th>
                    <th style="width: 10%; text-align: center;">Qty</th>
                    <th style="width: 17%; text-align: right;">Harga Satuan</th>
                    <th style="width: 18%; text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody id="inv-display-items">
                <!-- Dynamically Populated -->
            </tbody>
        </table>

        <!-- Summary & Totals -->
        <div class="invoice-preview-summary">
            <div class="preview-summary-box">
                <div class="preview-summary-row">
                    <span>Subtotal:</span>
                    <strong id="inv-display-subtotal">Rp 0</strong>
                </div>
                <div class="preview-summary-row">
                    <span>Diskon:</span>
                    <span id="inv-display-discount">- Rp 0</span>
                </div>
                <div class="preview-summary-row">
                    <span>Pajak (PPN):</span>
                    <span id="inv-display-tax">+ Rp 0</span>
                </div>
                <div class="preview-summary-row grand-total">
                    <span>Total Tagihan:</span>
                    <span id="inv-display-grand-total">Rp 0</span>
                </div>
            </div>
        </div>

        <!-- Payment Info & Terms -->
        <div class="preview-payment-info">
            <strong style="display:block; color:#0f172a; margin-bottom:0.35rem;">Informasi Rekening Pembayaran:</strong>
            <div id="inv-display-payment-info" style="white-space: pre-line; line-height:1.5;">
                BCA: 8730-192-881 a/n InvoiceLite Studio
                Mandiri: 137-00-1928-3310
            </div>
            <div style="margin-top:0.85rem; padding-top:0.85rem; border-top:1px solid #e2e8f0; font-size:0.8rem; color:#64748b;" id="inv-display-notes">
                Catatan: Harap cantumkan nomor invoice saat melakukan transfer.
            </div>
        </div>

        <!-- Signature Block -->
        <div style="margin-top: 3.5rem; display: flex; justify-content: flex-end; text-align: center;">
            <div style="width: 220px;">
                <div style="font-size: 0.85rem; color: #64748b; margin-bottom: 4rem;">Hormat Kami,</div>
                <div style="font-weight: 700; color: #0f172a; border-top: 1px solid #cbd5e1; padding-top: 0.5rem;">
                    InvoiceLite Finance
                </div>
                <div style="font-size: 0.75rem; color: #94a3b8;">Finance & Billing Dept</div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="public/js/invoice-builder.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const targetInv = urlParams.get('inv');
            const invoices = InvoiceEngine.getInvoices();

            let invoice = null;
            if (targetInv) {
                invoice = invoices.find(i => i.invoice_number === targetInv || i.id === targetInv);
            }
            if (!invoice && invoices.length > 0) {
                invoice = invoices[0];
            }

            if (!invoice) return;

            // Populate preview fields
            document.getElementById('inv-display-number').textContent = invoice.invoice_number;
            document.getElementById('inv-display-issue-date').textContent = invoice.issue_date;
            document.getElementById('inv-display-due-date').textContent = invoice.due_date;

            // Status Badge
            const statusEl = document.getElementById('inv-display-status');
            if (statusEl) {
                statusEl.innerHTML = `<span class="status-badge status-${invoice.status}">${invoice.status.toUpperCase()}</span>`;
            }

            // Client Info
            document.getElementById('inv-display-client-name').textContent = invoice.client_name;
            document.getElementById('inv-display-client-details').innerHTML = `
                ${invoice.client_email ? invoice.client_email + '<br>' : ''}
                ${invoice.client_address ? invoice.client_address : ''}
            `;

            // Items Table
            const itemsTbody = document.getElementById('inv-display-items');
            itemsTbody.innerHTML = '';
            invoice.items.forEach((item, idx) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="color:#94a3b8;">${idx + 1}</td>
                    <td><strong>${item.description}</strong></td>
                    <td style="text-align:center;">${item.qty}</td>
                    <td style="text-align:right;">${InvoiceEngine.formatCurrency(item.unit_price, invoice.currency)}</td>
                    <td style="text-align:right; font-weight:700;">${InvoiceEngine.formatCurrency(item.subtotal, invoice.currency)}</td>
                `;
                itemsTbody.appendChild(tr);
            });

            // Summary
            document.getElementById('inv-display-subtotal').textContent = InvoiceEngine.formatCurrency(invoice.subtotal, invoice.currency);
            document.getElementById('inv-display-discount').textContent = `- ${InvoiceEngine.formatCurrency(invoice.discount_amount || 0, invoice.currency)}`;
            document.getElementById('inv-display-tax').textContent = `+ ${InvoiceEngine.formatCurrency(invoice.tax_amount || 0, invoice.currency)}`;
            document.getElementById('inv-display-grand-total').textContent = InvoiceEngine.formatCurrency(invoice.total_amount, invoice.currency);

            if (invoice.payment_info) {
                document.getElementById('inv-display-payment-info').textContent = invoice.payment_info;
            }
            if (invoice.notes) {
                document.getElementById('inv-display-notes').textContent = 'Catatan: ' + invoice.notes;
            }
        });
    </script>
</body>
</html>
