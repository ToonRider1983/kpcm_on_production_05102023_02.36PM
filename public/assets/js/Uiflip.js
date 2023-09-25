$(document).ready(function() {
    // Panel 1
    $("#flip1").click(function() {
      $("#panel1").slideToggle("slow");
    });
    // Close button for Panel 1
    $("#close1").click(function() {
      $("#panel1").slideUp("slow");
    });
    // Panel 2
    $("#flip2").click(function() {
      $("#panel2").slideToggle("slow");
    });
    // Close button for Panel 2
    $("#close2").click(function() {
      $("#panel2").slideUp("slow");
    });
    // Panel 3
    $("#flip3").click(function() {
      $("#panel3").slideToggle("slow");
    });
    // Close button for Panel 3
    $("#close3").click(function() {
      $("#panel3").slideUp("slow");
    });
  });
  