import { HttpHeaders } from '@angular/common/http';
export function getHeaders() {
  return new HttpHeaders({
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': '*',
    'Authorization': 'Bearer ' + localStorage.getItem('access_token')

  });
}