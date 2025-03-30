            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme')}}">
                <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column')}}">
                    <div class="mb-2 mb-md-0">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>

                    </div>
                </div>
            </footer>
            <!-- / Footer -->
            <div class="position-fixed bottom-0 end-0 p-3 " style="z-index: 11">
                <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Notification</strong>
                        <small>Just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>

            @if (session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var toastDOMElement = document.getElementById("liveToast");
                        var myToast = new bootstrap.Toast(toastDOMElement);
                        myToast.show(); // This will show the toast
                    });
                </script>
            @endif

            <div class="content-backdrop fade"></div>

            </div>
            <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
            </div>
            <!-- / Layout wrapper -->


            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

            <!-- Core JS -->
            <!-- build:js assets/vendor/js/core.js -->
            <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
            <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
            <script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
            <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

            <script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>
            <!-- endbuild -->

            <!-- Vendors JS -->
            <script src="{{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

            <!-- Main JS -->
            <script src="{{ asset('backend/assets/js/main.js') }}"></script>

            <!-- Page JS -->
            <script src="{{ asset('backend/assets/js/dashboards-analytics.js') }}"></script>

            <!-- Place this tag in your head or just before your close body tag. -->
            <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
            </body>

            </html>
