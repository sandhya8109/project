
$(document).ready(function() {
  // Get the user's profile picture URL from a database or session variable
  var profilePicUrl = "path/to/profile-pic.png";

  // Set the src attribute of the profile picture img element to the profilePicUrl
  $('#profile-pic').attr('src', profilePicUrl);
});