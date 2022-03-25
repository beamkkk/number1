function sweet_success_href(title,text,location) {
    Swal.fire({
        icon: 'success',
        title: title,
        text: text,
        timerProgressBar: true,
        confirmButtonColor: "#00ef7f",
        // timer: 2000 
    }).then(function() {window.location = location})
}

function sweet_success(title,text) {
    Swal.fire({
        icon: 'success',
        title: title,
        text: text,
        timerProgressBar: true,
        confirmButtonColor: "#00ef7f",
        timer: 2000 
    })
}

function sweet_error_href(title,text,location) {
    Swal.fire({
        icon: 'error',
        title: title,
        text: text,
        confirmButtonColor: "#00ef7f",
        timerProgressBar: true
    }).then(function() {window.location = location})
}

function sweet_error(title,text) {
    Swal.fire({
        icon: 'error',
        title: title,
        text: text,
        // timer: 2000,s
        timerProgressBar: true
    })
}

function sweet_loading(){
	Swal.fire({
		icon: 'info',
		title: 'Loading..',
		text: 'กรุณารอสักครู่..',
        timerProgressBar: true,
		didOpen: () => {
			Swal.showLoading()
		}
	})
}


function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}