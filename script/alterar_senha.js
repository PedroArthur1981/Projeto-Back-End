function openModal() {
    document.getElementById("myModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Close modal if clicked outside of it
window.onclick = function (event) {
    if (event.target == document.getElementById("myModal")) {
        closeModal();
    }
};