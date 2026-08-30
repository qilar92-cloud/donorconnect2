<footer class="sticky-footer donor-footer">

    <div class="container my-auto">

        <div class="donor-footer-content">

            <span class="footer-brand">
                Qila <span>|</span> DonorConnect
            </span>

            <span class="footer-copy">
                &copy; {{ date('Y') }}
            </span>

        </div>

    </div>

</footer>


<style>

.donor-footer {
    min-height: 58px;
    background: #fffaf5 !important;
    border-top: 1px solid #f1dedc;
}

.donor-footer-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 58px;
}

.footer-brand {
    color: #b9364d;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.footer-brand span {
    margin: 0 3px;
    color: #d99ba3;
}

.footer-copy {
    color: #aa999b;
    font-size: 10px;
}

@media (max-width: 480px) {

    .donor-footer-content {
        gap: 5px;
    }

    .footer-brand {
        font-size: 10px;
    }

    .footer-copy {
        font-size: 9px;
    }

}

</style>