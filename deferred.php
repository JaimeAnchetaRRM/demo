<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>deferred.done demo</title>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
 
<button>Go</button>
<p>Ready...</p>
 
<script>
  var myvar;

  var setVal = function(){
    var deferred = $.Deferred();
    setTimeout(function(){
       if (window.location.hash) {
        scrollToSection(window.location.hash);
        deferred.resolve();
      }
        
      }, 2000);
    return deferred.promise();
  };

  setVal().done(function() {
   console.log('all done:'); 
 });
 
</script>
 
</body>
</html>