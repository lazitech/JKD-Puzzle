async function fetchTextFile(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        const text = await response.text();
        console.log('File content:', text);
        return text;
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
}
async function updateTextFile(url, content) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ content: content })
        });
        const data = await response.json();
        if (data.status === 'success') {
            console.log('File updated successfully:', data.message);
        } else {
            console.error('Error updating file:', data.message);
        }
    } catch (error) {
        console.error('There was an error with the fetch operation:', error);
    }
}
async function count(level,flag) {
    const fileUrl = 'https://ii.lazic.cn/data.txt';
    const content = await fetchTextFile(fileUrl);
    if (content) {
        let fileContent = content;
        let lines = fileContent.split(/\r?\n/); 
        for (var i = 0; i < 15; ++i) {
            console.log(lines[i])
        }
        flag= +flag
        if(flag==1)
            lines[level]++
        let str = ""
        for (var i = 0; i < 15; ++i) {
            str = str + lines[i];
            str = str + "\n";
        }
        console.log(str)
        const updateUrl = 'https://ii.lazic.cn/update-file.php';
        await updateTextFile(updateUrl, str);
        return lines;
    }
}





function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}