<footer class="donor-footer">

    <div class="container-fluid px-3">

        <div class="donor-footer-content">

            <div class="footer-brand">
                <span class="footer-name">Qila</span>
                <span class="footer-divider">|</span>
                <span class="footer-app">DonorConnect</span>
            </div>

            <div class="footer-copy">
                &copy; {{ date('Y') }}
            </div>

        </div>

    </div>

</footer>

<style>

/* Footer */

.donor-footer {
    position: relative !important;
    inset: auto !important;
    bottom: auto !important;
    left: auto !important;
    right: auto !important;

    width: 100%;
    min-height: 58px;

    background: #fffaf5 !important;
    border-top: 1px solid #f1dedc;

    box-sizing: border-box;

    z-index: 10;
}

.donor-footer-content {
    min-height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 8px;
    padding: 10px 0;

    box-sizing: border-box;
}


/* Brand */

.footer-brand {
    display: flex;
    align-items: center;

    white-space: nowrap;

    font-size: 12px;
    line-height: 1.4;
    font-weight: 700;

    letter-spacing: 0.2px;
}

.footer-name {
    color: #b9364d;
}

.footer-divider {
    margin: 0 5px;
    color: #d99ba3;
    font-weight: 500;
}

.footer-app {
    color: #8f183f;
}


/* Copyright */

.footer-copy {
    color: #aa999b;

    font-size: 11px;
    line-height: 1.4;

    white-space: nowrap;
}


/* Tablet */

@media (max-width: 991px) {

    .donor-footer {
        min-height: 56px;
    }

    .donor-footer-content {
        min-height: 56px;
        gap: 7px;
        padding: 9px 0;
    }

    .footer-brand {
        font-size: 11px;
    }

    .footer-copy {
        font-size: 10px;
    }

}


/* HP */

@media (max-width: 576px) {

    .donor-footer {
        min-height: 54px;
    }

    .donor-footer-content {
        min-height: 54px;
        gap: 6px;
        padding: 9px 0;
        text-align: center;
    }

    .footer-brand {
        font-size: 10.5px;
    }

    .footer-divider {
        margin: 0 4px;
    }

    .footer-copy {
        font-size: 9.5px;
    }

}


/* HP kecil */

@media (max-width: 380px) {

    .donor-footer-content {
        gap: 5px;
    }

    .footer-brand {
        font-size: 10px;
    }

    .footer-divider {
        margin: 0 3px;
    }

    .footer-copy {
        font-size: 9px;
    }

}


/* Safe area */

@media (max-width: 576px) {

    .donor-footer {
        padding-bottom: env(safe-area-inset-bottom);
    }

}

</style>