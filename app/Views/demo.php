<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Demo</title>
   <!-- Autocomplete -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   <script>
   $(function() {
      $("#keyword").autocomplete({
         source: "<?php echo site_url('demo/ajax'); ?>"
      });
   });
   </script>
</head>
<h3>Autocompete</h3>
<input type="text" id="keyword">

<body>

</body>

</html>