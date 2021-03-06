// membuat javascript untuk memunculkan collapse pada div sidebar-collapse ketika dibuka di mobile 
      $(window).bind("load resize", function()
      {
        if ($(this).width() <768) 
        {
          $('div.sidebar-collapse').addClass('collapse')
        }
        else
        {
          $('div.sidebar-collapse').removeClass('collapse')
        }
      })

      // jquery untuk dropdown menu
      $(document).ready(function(){
        // menyentuh li tr-tree
        $(".tr-tree").each(function(){
          // menyentuh a href nya
          var link = $( this).children("a").first();
          // menyentuh submenu nya
          var submenu = $( this).children(".tr-tree-menu").first();
          // untuk mengetahui apakah li nya punya class active
          var isActive = $( this).hasClass("active");

          // jika benar active
          if(isActive){
            submenu.slideDown();
            link.children(".fa-angle-right").first().removeClass("fa-angle-right").addClass("fa-angle-down");
          }

          // jika link di click
          link.click(function(e){
            e.preventDefault(); //mencegah a href agar tidak lari ke halaman lain
            if (isActive){
              submenu.slideUp();
              isActive=false;
              link.children(".fa-angle-down").first().removeClass("fa-angle-down").addClass("fa-angle-right");
            }
            else
            {
              submenu.slideDown();
              isActive=true;
              link.children(".fa-angle-right").first().removeClass("fa-angle-right").addClass("fa-angle-down");
            }
          })
        })
      })