"use strict";

function downloadAsTxt(elementOrText, slug) {
  const content = elementOrText;

  // Create a Blob with the text content
  const blob = new Blob([content], { type: "text/plain" });

  // Create a download link
  const a = document.createElement("a");
  a.href = URL.createObjectURL(blob);
  a.download = slug + "_" + Number(new Date()) + ".txt";
  a.textContent = "Download Text File";

  // Append the link to the body and trigger a click event
  document.body.appendChild(a);
  a.click();

  // Clean up by removing the link and revoking the URL
  document.body.removeChild(a);
  URL.revokeObjectURL(a.href);
}

function toastError(message) {
  const html = `<div class="toast toast-danger show" role="alert" aria-live="assertive" data-bs-delay="3000" aria-atomic="true">
                  <div class="d-flex">
                      <div class="toast-body">${message}</div>
                      <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
              </div>`;
  this.initToast(html);
}
