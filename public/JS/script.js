let jsonData = await fetch("/ajax", {method:"get"}).then(e=> e.json()).then(data=>console.log(data));
return jsonData;