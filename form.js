function toggleKidSection() {
  const section = document.getElementById("kidsContainer");
  const choice = document.querySelector('input[name="hasKids"]:checked');
  const kidList = document.getElementById("kidList");

  if (choice && choice.value === "yes") {
    section.classList.remove("hidden");
    if (kidList.children.length === 0) {
      addKid();
    }
  } else {
    section.classList.add("hidden");
    kidList.innerHTML = "";
  }
}

function addKid() {
  const kidList = document.getElementById("kidList");
  const index = kidList.children.length;

  const div = document.createElement("div");
  div.classList.add("kid-entry");

  div.innerHTML = `
    <label>Kid ${index + 1} Name:</label>
    <input type="text" name="kid_names[]" required>
    <label>Kid ${index + 1} Age:</label>
    <input type="number" name="kid_ages[]" min="0" required>
  `;

  kidList.appendChild(div);
}

function validateAndSubmit(event) {
  event.preventDefault();

  // ✅ Show alert and submit form
  alert("✅ You will get the nest for Chitu Kurruviii 🔥");
  document.getElementById("regForm").submit();
}

// ✅ On page load, check URL parameters
window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search);

  if (urlParams.get("duplicate") === "1") {
    alert("❌ This email or mobile number is already registered!");
  } else if (urlParams.get("success") === "1") {
    alert("✅ Registration successful! Nest is on the way! 🐥");
  }
};
