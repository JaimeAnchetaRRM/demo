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
var dfd = $.Deferred();



// 3 functions to call when the Deferred object is resolved
function fn1() {
  $( "p" ).append( " 1 " );
}
function fn2() {
  $( "p" ).append( " 2 " );
}
function fn3( n ) {
  $( "p" ).append( n + " 3 " + n );
}
 
// Create a deferred object
var dfd = $.Deferred();
 
// Add handlers to be called when dfd is resolved
dfd
// .done() can take any number of functions or arrays of functions
  .done( [ fn1, fn2 ], fn3, [ fn2, fn1 ] )
// We can chain done methods, too
  .done(function( n ) {
    $( "p" ).append( n + " we're done." );
  });
 
// Resolve the Deferred object when the button is clicked
$( "button" ).on( "click", function() {
  dfd.resolve( "and" );
  $.get( "deferred.php" ).done(function() {
    alert( "$.get succeeded" );
  });
});


// ==============================

$(document).ready(function (e) {

   function scrollToSection(id) {
  $('html, body').animate({
    scrollTop: $(id).offset().top - 80
  }, 100);
}

  var dfd = $.Deferred();
  .done([scrollToSection])
  
  if (window.location.hash) {
    dfd.resolve(scrollToSection(window.location.hash));
  }

});
  
//  function scrollToSection(id) {
//   $('html, body').animate({
//     scrollTop: $(id).offset().top - 80
//   }, 100);
// }

</script>
 
</body>
</html>