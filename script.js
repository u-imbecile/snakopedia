// Check if URL contains login=success
const params = new URLSearchParams(window.location.search);

if (params.get("login") === "success") {
  alert("Login successfully, You will now receive personalized email's on snakes.");

  // Optional: remove ?login=success from URL
  window.history.replaceState({}, document.title, "index.html");
}
