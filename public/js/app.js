function watchStatus() {
  const statusEl = document.querySelector('#status-selector');
  statusEl.addEventListener('change', updateStatus)
}

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

function toggleSuccessMessage() {
  document.querySelector('#status-message').classList.toggle('hidden')
}

function watchButtons(selector, callback){
  const buttons = document.querySelectorAll(selector);
  for (let button of buttons){
    button.addEventListener('click', callback)
  }
}

function toggleNoteForm(e){
  const id = e.target.id.replace('edit-', '');
  const form = document.querySelector(`#form-${id}`);
  const note = document.querySelector(`#note-${id}`)
  form.classList.toggle('d-none');
  note.classList.toggle('d-none')
}

function deleteNote(e){
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
      if (res.status === 200) window.location.href = window.location.href;
    })
    .catch(err => console.error(err))
}