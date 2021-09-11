  $(document).ready(function() {
    selesai();
  });

  function selesai() {
    setTimeout(function() {
      update();
      selesai();
    }, 200);
  }

  function update() {
    $.getJSON("api/notifikasi.php", function(data) {
      $(".count").empty();
      $.each(data.result, function() {
        var hasil = this['totnotifikasi']
        if (hasil > 0) 
        {
        $('.count').html(hasil);
        }
      });
    });
  }