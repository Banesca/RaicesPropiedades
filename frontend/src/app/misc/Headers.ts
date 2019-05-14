import { HttpHeaders } from '@angular/common/http';

export function getHeaders() {
  return new HttpHeaders({
    'Content-Type': 'application/json'
  });
}