export default function authHeader() {
    let user = localStorage.getItem('user');
    let token = localStorage.getItem('token');
    if (user && token) {
        // console.log('Bearer ' + token);
      return { Authorization: 'Bearer ' + token };
    } else {
      return {};
    }
  }