 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src={!! asset("assetadmin/js/jquery.min.js") !!}></script>
    <!-- Bootstrap -->
    <script src={!! asset("assetadmin/js/bootstrap.min.js") !!}></script>
    <!-- FastClick -->
    <script src={!! asset("assetadmin/js/fastclick.js") !!}></script>
    <!-- NProgress -->
    <script src={!! asset("assetadmin/js/nprogress.js") !!}></script>
    <!-- dataTable js -->
    <script src={!! asset("assetadmin/js/jquery.dataTables.min.js") !!}></script>
    <script src={!! asset("assetadmin/js/dataTables.bootstrap.min.js") !!}></script>
    <script src={!! asset("assetadmin/js/dataTables.responsive.min.js") !!}></script>
    <script src={!! asset("assetadmin/js/responsive.bootstrap.js") !!}></script>
    <!-- datepicker -->
    <script src={!! asset("assetadmin/js/bootstrap-datepicker.js") !!}></script>
    <!-- notify -->
    <script src={!! asset("assetadmin/js/notify.min.js") !!}></script>
    <!-- Custom Theme Scripts -->
    <script src={!! asset("assetadmin/js/custom.js") !!}></script>
    <script src={!! asset("assetuser/js/sweetalert.min.js") !!}></script>

    @include('sweet::alert')
    
    @yield('js')
  </body>
</html>