    </div>
    <!-- /Container -->

            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p>Copyright © 2019 EPCTCO. All Right Reserved. Developed by <a href="http://www.everestbs.com" target="_blank">EverestBS</a></p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->


      @yield('modals')


    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="{{url('des/cp')}}/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('des/cp')}}/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{url('des/cp')}}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{url('des/cp')}}/dist/js/jquery.slimscroll.js"></script>


    <!-- FeatherIcons JavaScript -->
    <script src="{{url('des/cp')}}/dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="{{url('des/cp')}}/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="{{url('des/cp')}}/dist/js/toggle-data.js"></script>



	<!-- Easy pie chart JS -->
    <script src="{{url('des/cp')}}/vendors/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>


    <!-- Init JavaScript -->
    <script src="{{url('des/cp')}}/dist/js/init.js"></script>
	<script src="{{url('des/cp')}}/dist/js/dashboard2-data.js"></script>

  @stack('scripts')
</body>

</html>
