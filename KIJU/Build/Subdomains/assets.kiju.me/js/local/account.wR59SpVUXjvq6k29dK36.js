/**
 * Kiju 
 * 
 * Write your story.
 * JS Version : 23.0
*/

const toastBox = document.getElementById("toast_Box");
const toastMessages = {
   "KIJU_Data": '<i class="lni lni-ban"></i> Il vous manque des informations',
   "KIJU_Success": '<i class="lni lni-checkmark"></i> Modifications appliquées'
};

function showToast(message) {
   let toast = document.createElement('div');
   toast.classList.add('toast');

   message = toastMessages[message] || '<i class="lni lni-ban"></i> Code d\'erreur inconnu';

   toast.innerHTML = message;
   toastBox.appendChild(toast);

   setTimeout(() => {
      toast.remove();
   }, 6000);
}