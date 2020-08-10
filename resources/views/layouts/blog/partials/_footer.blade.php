<footer class="with-pattern-1 position-relative">
  <div class="container section-padding-y">
    <div class="row">
      <div class="col-lg-3 mb-4 mb-lg-0"><img class="mb-4" src="img/logo.svg" alt="" width="110">
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
      </div>
      <div class="col-lg-2 mb-4 mb-lg-0">
        <h2 class="h5 mb-4">Quick Links</h2>
        <div class="d-flex">
          <ul class="list-unstyled d-inline-block mr-4 mb-0">
            <li class="mb-2"><a class="footer-link" href="#">History </a></li>
            <li class="mb-2"><a class="footer-link" href="#">About us</a></li>
            <li class="mb-2"><a class="footer-link" href="#">Contact us</a></li>
            <li class="mb-2"><a class="footer-link" href="#">Services</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 mb-4 mb-lg-0">
        <h2 class="h5 mb-4">Services</h2>
        <div class="d-flex">
          <ul class="list-unstyled mr-4 mb-0">
            <li class="mb-2"><a class="footer-link" href="#">History </a></li>
            <li class="mb-2"><a class="footer-link" href="#">About us</a></li>
            <li class="mb-2"><a class="footer-link" href="#">Contact us</a></li>
            <li class="mb-2"><a class="footer-link" href="#">Services</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-5">
        <h2 class="h5 mb-4">Contact Info</h2>
        <ul class="list-unstyled mr-4 mb-3">
          <li class="mb-2 text-muted">728 Ocello Street, San Diego, California. </li>
          <li class="mb-2"><a class="footer-link" href="tel:619-851-4132">619-851-4132</a></li>
          <li class="mb-2"><a class="footer-link" href="mailto:Nova@example.com">Nova@example.com</a></li>
        </ul>
        <ul class="list-inline mb-0">
          <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-google-plus"></i></a></li>
          <li class="list-inline-item"><a class="social-link" href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copyrights">
    <div class="container text-center py-4">
      <p class="mb-0 text-muted text-sm">&copy; 2019, Your company. Template by <a href="https://bootstraptemple.com" class="text-reset">Bootstrap Temple</a>.</p>
    </div>
  </div>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $('body').on('change', '.provinsi-dropdown', function() {
    console.log('Provinsi Changed');
    if ($(this).val() != '') {
      var select = $(this).attr("id");
      var value = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      console.log("Province id :" + value);
      $.ajax({
        url: "{{route('kades.getregency')}}",
        method: "POST",
        data: {
          select: select,
          value: value
        },
        success: function(result) {
          $('.kabupaten-dropdown').html(result);

        }
      })
    }
  })

  $('body').on('change', '.kabupaten-dropdown', function() {
    console.log('Kabupaten Changed');
    if ($(this).val() != '') {
      var select = $(this).attr("id");
      var value = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      console.log('Kabupaten id : ' + value);
      $.ajax({
        url: "{{route('kades.getdistrict')}}",
        method: "POST",
        data: {
          select: select,
          value: value
        },
        success: function(result) {
          $('.kecamatan-dropdown').html(result);
        }

      })
    }
  })

  $('body').on('change', '.kecamatan-dropdown', function() {
    console.log('Kecamatan Changed');
    if ($(this).val() != '') {
      var select = $(this).attr("id");
      var value = $(this).val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      console.log('Kecamatan id : ' + value);
      $.ajax({
        url: "{{route('kades.getvillage')}}",
        method: "POST",
        data: {
          select: select,
          value: value
        },
        success: function(result) {
          $('.kelurahan-dropdown').html(result);
        }
      })
    }
  })
</script>