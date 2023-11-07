Store = (url, method = 'get', data = {}, headers = {}) => {
    const ajax = new XMLHttpRequest();

    if ((method !== 'get' && method !== 'post') && method != null) {
        method = 'post';
    }

    ajax.open(method, url, true);


    let form = new FormData(data) ;

    for (da in data){
        
    }

    ajax.send();

    ajax.onreadystatechange = () => {
        if (ajax.readyState === 4) {
            console.log(JSON.parse());
        }
    }
}
