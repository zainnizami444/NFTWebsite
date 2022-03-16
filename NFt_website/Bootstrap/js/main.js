
  $("#getting-started")
  .countdown("", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });
