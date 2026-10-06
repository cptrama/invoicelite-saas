/**
 * InvoiceLite — Frontend UI Interactions & Theme Logic
 * Author: Suraya Akbar (Frontend UI/UX Lead)
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Sticky Navbar on Scroll
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 30) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // 2. Mobile Menu Toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', function () {
            navLinks.classList.toggle('mobile-active');
            const isOpen = navLinks.classList.contains('mobile-active');
            mobileToggle.setAttribute('aria-expanded', isOpen);
        });

        // Close menu when clicking outside or link
        document.addEventListener('click', function (e) {
            if (!navbar.contains(e.target) && navLinks.classList.contains('mobile-active')) {
                navLinks.classList.remove('mobile-active');
            }
        });
    }

    // 3. Theme Toggle (Dark / Light Mode)
    const themeBtn = document.querySelector('.theme-toggle-btn');
    const savedTheme = localStorage.getItem('invoicelite_theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme);

    if (themeBtn) {
        themeBtn.addEventListener('click', function () {
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('invoicelite_theme', newTheme);
            updateThemeIcon(newTheme);
        });
    }

    function updateThemeIcon(theme) {
        if (!themeBtn) return;
        const iconContainer = themeBtn.querySelector('.theme-icon');
        if (iconContainer) {
            if (theme === 'light') {
                iconContainer.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>`;
            } else {
                iconContainer.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>`;
            }
        }
    }

    // 4. FAQ Accordion Toggle
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(button => {
        button.addEventListener('click', function () {
            const faqItem = this.parentElement;
            const isOpen = faqItem.classList.contains('active');

            // Close all items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Toggle current if it was not open
            if (!isOpen) {
                faqItem.classList.add('active');
            }
        });
    });

    // 5. Pricing Toggle (Monthly vs Annual)
    const pricingSwitch = document.getElementById('pricing-switch');
    if (pricingSwitch) {
        pricingSwitch.addEventListener('change', function () {
            const isAnnual = this.checked;
            const monthlyPrices = document.querySelectorAll('.price-monthly');
            const annualPrices = document.querySelectorAll('.price-annual');
            const labels = document.querySelectorAll('.toggle-label');

            labels.forEach(lbl => lbl.classList.toggle('active'));

            if (isAnnual) {
                monthlyPrices.forEach(el => el.style.display = 'none');
                annualPrices.forEach(el => el.style.display = 'inline-block');
            } else {
                monthlyPrices.forEach(el => el.style.display = 'inline-block');
                annualPrices.forEach(el => el.style.display = 'none');
            }
        });
    }

    // 6. Interactive Live Demo Calculator (Interactive Product Preview)
    const demoItemQty = document.getElementById('demo-item-qty');
    const demoItemPrice = document.getElementById('demo-item-price');
    const demoTaxRate = document.getElementById('demo-tax-rate');
    const demoDiscount = document.getElementById('demo-discount');

    const demoSubtotalEl = document.getElementById('demo-calc-subtotal');
    const demoTaxEl = document.getElementById('demo-calc-tax');
    const demoDiscountEl = document.getElementById('demo-calc-discount');
    const demoTotalEl = document.getElementById('demo-calc-total');

    function calculateDemoTotal() {
        if (!demoItemQty || !demoItemPrice) return;

        const qty = parseFloat(demoItemQty.value) || 0;
        const price = parseFloat(demoItemPrice.value) || 0;
        const taxPercent = parseFloat(demoTaxRate?.value) || 0;
        const discountVal = parseFloat(demoDiscount?.value) || 0;

        const subtotal = qty * price;
        const taxAmount = (subtotal * taxPercent) / 100;
        const grandTotal = Math.max(0, subtotal + taxAmount - discountVal);

        if (demoSubtotalEl) demoSubtotalEl.textContent = formatRupiah(subtotal);
        if (demoTaxEl) demoTaxEl.textContent = formatRupiah(taxAmount);
        if (demoDiscountEl) demoDiscountEl.textContent = formatRupiah(discountVal);
        if (demoTotalEl) demoTotalEl.textContent = formatRupiah(grandTotal);
    }

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
    }

    if (demoItemQty && demoItemPrice) {
        [demoItemQty, demoItemPrice, demoTaxRate, demoDiscount].forEach(input => {
            if (input) {
                input.addEventListener('input', calculateDemoTotal);
            }
        });
        calculateDemoTotal();
    }

    // 7. Smooth Scrolling for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const targetEl = document.querySelector(targetId);
            if (targetEl) {
                e.preventDefault();
                targetEl.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
