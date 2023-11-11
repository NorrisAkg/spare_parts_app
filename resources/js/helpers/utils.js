export function getUrlParam(url, paramName = "page") {
    const params = new URLSearchParams(new URL(url).search);
    let needed = params.get(paramName);

    if (needed !== null) parseInt(params.get(paramName), 10);

    return needed;
}


// Check if the user is authenticated
export const isUserAuthenticated = () => {
    const user = JSON.parse(localStorage.getItem('user'));
    const token = JSON.parse(localStorage.getItem('token'));
    if (user !== null && token !== null) return user;
    else return null;
};

// Log user out
export const logout = () => {
    localStorage.clear();
};
