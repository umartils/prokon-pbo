<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>
                        2023 © Davi Hanan Lutfhi Abiyyu
                        <!-- <a href="#"> <i class="ti-heart"></i> </a><a href=""> Dashboard</a> -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div id="back-top" style="display: none">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll('.tableRow');

        rows.forEach(function(row) {
            var data = row.innerText.toLowerCase();
            if (data.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

<script src="<?= base_url("assets/") ?>js/jquery1-3.4.1.min.js"></script>

<script src="<?= base_url("assets/") ?>js/popper1.min.js"></script>

<script src="<?= base_url("assets/") ?>js/bootstrap1.min.js"></script>

<script src="<?= base_url("assets/") ?>js/metisMenu.js"></script>

<script src="<?= base_url("assets/") ?>vendors/count_up/jquery.waypoints.min.js"></script>

<script src="<?= base_url("assets/") ?>vendors/chartlist/Chart.min.js"></script>

<script src="<?= base_url("assets/") ?>vendors/count_up/jquery.counterup.min.js"></script>

<script src="<?= base_url("assets/") ?>vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="<?= base_url("assets/") ?>vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="<?= base_url("assets/") ?>vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/buttons.flash.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/jszip.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/pdfmake.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/vfs_fonts.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/buttons.html5.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/datatable/js/buttons.print.min.js"></script>
<script src="<?= base_url("assets/") ?>js/chart.min.js"></script>

<script src="<?= base_url("assets/") ?>vendors/progressbar/jquery.barfiller.js"></script>

<script src="<?= base_url("assets/") ?>vendors/tagsinput/tagsinput.js"></script>

<script src="<?= base_url("assets/") ?>vendors/text_editor/summernote-bs4.js"></script>
<script src="<?= base_url("assets/") ?>vendors/am_chart/amcharts.js"></script>

<script src="<?= base_url("assets/") ?>vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="<?= base_url("assets/") ?>vendors/scroll/scrollable-custom.js"></script>
<script src="<?= base_url("assets/") ?>vendors/chart_am/core.js"></script>
<script src="<?= base_url("assets/") ?>vendors/chart_am/charts.js"></script>
<script src="<?= base_url("assets/") ?>vendors/chart_am/animated.js"></script>
<script src="<?= base_url("assets/") ?>vendors/chart_am/kelly.js"></script>
<script src="<?= base_url("assets/") ?>vendors/chart_am/chart-custom.js"></script>

<script src="<?= base_url("assets/") ?>js/custom.js"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/marketing-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Aug 2023 09:00:17 GMT -->

</html>