import './navbar/showprofilemenu.js';
document.addEventListener('submit', async (event) => {
	const form = event.target;

	if (!(form instanceof HTMLFormElement) || !form.matches('[data-delete-file-form]')) {
		return;
	}

	event.preventDefault();

	const response = await fetch(form.action, {
		method: 'POST',
		body: new FormData(form),
		headers: {
			'X-Requested-With': 'XMLHttpRequest',
			'Accept': 'application/json',
		},
	});

	if (response.status === 204) {
		const row = form.closest('li');
		if (row) {
			row.remove();
		}
	}
});