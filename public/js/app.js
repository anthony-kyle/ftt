/**
 * App.js
 * 
 * Custom functionality for Fergus Technical Test
 */

/**
 * Function to watch the status select box, and trigger an
 * update status funtion if triggered
 */
function watchStatus() {
  const statusEl = document.querySelector('#status-selector');
  statusEl.addEventListener('change', updateStatus)
}

/**
 * Function to update the status of the specified job via Fetch API
 * 
 * @param Event e 
 */
function updateStatus(e) {
  const jobCode = e.target.dataset.jobId
  const status = e.target.value
  const csrf = document.querySelector('input[name="_token"]').value;

  const options = {
    method: 'PATCH',
    mode: 'same-origin',
    credentials: 'same-origin',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': csrf
    },
    body: JSON.stringify({ status: status })
  };

  fetch(`/jobs/${jobCode}/status`, options)
    .then(res => {
      if (res.status === 200) {
        toggleSuccessMessage()
      }
    })
    .then(() => {
      setTimeout(toggleSuccessMessage, 2000)
    })
    .catch(err => console.error(err))
}

/**
 * Function to toggle the hidden class on the success message
 */
function toggleSuccessMessage() {
  document.querySelector('#status-message').classList.toggle('hidden')
}

/**
 * Function to watch a group of buttons with the given selector,
 * and then to trigger a callback event if they are clicked
 * 
 * @param String selector 
 * @param Function callback 
 */
function watchButtons(selector, callback) {
  const buttons = document.querySelectorAll(selector);
  for (let button of buttons) {
    button.addEventListener('click', callback)
  }
}

/**
 * Function to show/hide the note form and note display
 * used for editing notes.
 * 
 * @param Event e 
 */
function toggleNoteForm(e) {
  const id = e.target.id.replace('edit-', '');
  const form = document.querySelector(`#form-${id}`);
  const note = document.querySelector(`#note-${id}`)
  form.classList.toggle('d-none');
  note.classList.toggle('d-none')
}

/**
 * Function to use Fetch API to create a DELETE request
 * to delete the given note. and remove from DOM on success
 * 
 * @param Event e 
 */
function deleteNote(e) {
  const jobCode = e.target.dataset.jobId
  const noteId = e.target.id.replace('delete-', '')
  const csrf = document.querySelector('input[name="_token"]').value;

  const options = {
    method: 'DELETE',
    mode: 'same-origin',
    credentials: 'same-origin',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': csrf
    }
  };

  fetch(`/jobs/${jobCode}/note/${noteId}`, options)
    .then(res => {
      if (res.status === 200) document.querySelector(`#note-${noteId}`).remove();
    })
    .catch(err => console.error(err))
}