Store = (url, method = 'get', data = {}, headers = {}) => {
    const ajax = new XMLHttpRequest();

    ajax.onreadystatechange = () => {
        if (ajax.readyState === 4) {
            // console.log(JSON.parse(this.response));
        }
    }
    
    if (method == 'GET') {
        ajax.open(method, url, true);
        ajax.setRequestHeader("Accept", 'application/json');
        ajax.send();
    }else{
        ajax.open(method, url, true);
        ajax.setRequestHeader("Accept", 'application/json');
    
        let form = new FormData() ;
    
        for (param of Object.keys(data)){
            form.append(param , data[param]);
        }
    
        ajax.send(form);
    }

   
}
