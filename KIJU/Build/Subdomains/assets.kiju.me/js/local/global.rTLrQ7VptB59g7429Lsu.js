/**
 * Kiju 
 * 
 * Write your story.
 * JS Version : 26.0
*/

// Déclaration des constantes
const sidebarContainer = document.querySelector('.sidebarContainer');
const sidebar = document.querySelector('.sidebar');
const toastBox = document.getElementById("toast_Box");
const modals = document.querySelectorAll(".modal");
const modalBtns = document.querySelectorAll(".modalBtn");
const closeBtns = document.querySelectorAll(".modalClose");
const skeleton_post = document.querySelectorAll('.skeleton-post');
const posts_loaded = document.querySelectorAll('.post-loaded');
const posts = document.querySelectorAll('.post');
const accounts = document.querySelectorAll('.account-loaded');
const dropdowns = document.querySelectorAll(".dropdown-menu");
const post_Textarea = document.getElementById('post-content');
const post_CharCount = document.getElementById('post_CharCount');
const comment_Textarea = document.getElementById('comment_Textarea');
const comment_CharCount = document.getElementById('comment_CharCount');
const mediasPreview = document.getElementById('medias-preview-container');
const searchForm = document.getElementById('searchForm');
const searchInput = document.getElementById('searchInput');
const searchResults = document.querySelector('.results');

// Défilement de la prévisualisation des médias
var isMouseDown = false;
var startX;
var scrollLeft;

document.querySelector('.scrollable').addEventListener('mousedown', function (e) {
  isMouseDown = true;
  startX = e.pageX - this.offsetLeft;
  scrollLeft = this.scrollLeft;
});

document.querySelector('.scrollable').addEventListener('mouseup', function () {
  isMouseDown = false;
});

document.querySelector('.scrollable').addEventListener('mouseleave', function () {
  isMouseDown = false;
});

document.querySelector('.scrollable').addEventListener('mousemove', function (e) {
  if (!isMouseDown) return;
  e.preventDefault();
  var x = e.pageX - this.offsetLeft;
  var walk = (x - startX) * 2; // Ajustez la sensibilité selon vos préférences
  this.scrollLeft = scrollLeft - walk;
});

// Affichages des médias temporaires
function createImageElement(src) {
  const imageContainer = document.createElement('div');
  imageContainer.className = 'preview-media';

  if (src) {
    imageContainer.style.backgroundImage = `url(${src})`;
  }

  return imageContainer;
}

function previewImage(input) {
  mediasPreview.innerHTML = "";

  if (input.files && input.files.length > 0) {
    Array.from(input.files).forEach(file => {
      const reader = new FileReader();
      const imagePreview = createImageElement('');

      reader.onload = function (e) {
        // Ne pas définir imagePreview.src ici
        imagePreview.style.backgroundImage = `url(${e.target.result})`;
      }

      reader.readAsDataURL(file);
      mediasPreview.appendChild(imagePreview);
    });
  }
}

// Ajustement du textarea
function adjustTextareaHeight(textarea) {
  textarea.style.height = 'auto';
  textarea.style.height = (textarea.scrollHeight + 2) + 'px';
}

function handleTextareaInput(event) {
  var textarea = event.target;
  adjustTextareaHeight(textarea);
}

document.querySelectorAll('textarea').forEach(function (textarea) {
  textarea.addEventListener('input', handleTextareaInput);
});


document.addEventListener("DOMContentLoaded", function() {
  if (searchForm && searchResults && searchInput) {
    searchForm.addEventListener('click', function(event) {
      searchResults.style.display = "block";
      searchInput.classList.add("search-input-active");
      event.stopPropagation();
    });

    document.addEventListener('click', function(event) {
      if (!searchForm.contains(event.target)) {
        searchResults.style.display = 'none';
        searchInput.classList.remove("search-input-active");
      }
    });
  }
});

function showToast(message) {
  const toast = document.createElement('div');
  toast.classList.add('toast');
  message = (message === "KIJU_Post") ? '<i class="lni lni-checkmark"></i> Vous avez publié avec succès' : message;
  toast.innerHTML = message;
  toastBox.appendChild(toast);

  setTimeout(() => {
    toast.remove();
  }, 6000)
}

if(modalBtns) {
  modalBtns.forEach(btn => {
    btn.onclick = function () {
      const modalId = btn.getAttribute("data-modal");
      const modal = document.getElementById(modalId);

      modals.forEach(element => {
        element.classList.remove('show');
      });
      modal.classList.add("show");
    };
  });

  closeBtns.forEach(btn => {
    btn.onclick = function () {
        const modal = btn.closest('.modal');
        if (modal) {
            modal.classList.remove("show");
        }
    };
  });

  window.onclick = function (event) {
    modals.forEach(modal => {
      if (event.target == modal) {
        modal.classList.remove("show");
      }
    });
  };
}

if(post_Textarea || post_CharCount) {
  post_Textarea.addEventListener('input', function() {
    const remainingChars = 2000 - this.value.length;
    post_CharCount.textContent = remainingChars;
  });
}

if(comment_Textarea || comment_CharCount) {
  comment_Textarea.addEventListener('input', function() {
    const remainingChars = 2000 - this.value.length;
    comment_CharCount.textContent = remainingChars;
  });
}

if(posts_loaded || accounts) {
  posts_loaded.forEach(item => {
    item.style.display = "none";
  });
  accounts.forEach(item => {
    item.style.display = "none";
  });
  window.addEventListener('load', function () {
    setTimeout(function () {
      skeleton_post.forEach(item => {
        item.style.display = "none";
      });
      posts_loaded.forEach(item => {
        item.style.display = "flex";
      });
      accounts.forEach(item => {
        item.style.display = "flex";
      });
    }, 2000);
  });
}

function authPopup() {
  const popup = window.open('https://account.kiju.me/auth', 'Connexion avec Kiju ID', 'width=400,height=560');
  window.addEventListener('message', function(event) {
    if (event.source === popup) {
      location.reload();
    }
  });
}
