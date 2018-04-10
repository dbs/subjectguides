(function() {
    var service = '643';
    if (document.documentElement['lang'] == 'fr') {
        service = '531';
    }
    var x = document.createElement("script"); x.type = "text/javascript"; x.async = true;
    x.src = (document.location.protocol === "https:" ? "https://" : "http://") + "ca.libraryh3lp.com/js/libraryh3lp.js?" + service;
    var y = document.getElementsByTagName("script")[0]; y.parentNode.insertBefore(x, y);
  })();
