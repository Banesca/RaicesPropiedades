/*import * as CryptoJS from 'crypto-js';

export class Crypt {
  // Code goes here
  static keySize = 256;
  static ivSize = 128;
  static iterations = 100;

  static getEnc() {
    return CryptoJS.enc.Utf8;
  }

  static MD5(pMsj: string): string {
    return CryptoJS.MD5(pMsj);
  }

  static encrypt(msg: string, pass: string) {
    const salt = CryptoJS.lib.WordArray.random(128 / 8);
    const key = CryptoJS.PBKDF2(pass, salt, {
      keySize: this.keySize / 32,
      iterations: this.iterations
    });

    const iv = CryptoJS.lib.WordArray.random(128 / 8);

    const encrypted = CryptoJS.AES.encrypt(msg, key, {
      iv: iv,
      padding: CryptoJS.pad.Pkcs7,
      mode: CryptoJS.mode.CBC
    });

    const transitmessage = salt.toString() + iv.toString() + encrypted.toString();
    return transitmessage;
  }

  static decrypt(transitmessage: string, pass: string) {

    const salt = CryptoJS.enc.Hex.parse(transitmessage.substr(0, 32));
    const iv = CryptoJS.enc.Hex.parse(transitmessage.substr(32, 32));
    const encrypted = transitmessage.substring(64);

    const key = CryptoJS.PBKDF2(pass, salt, {
      keySize: this.keySize / 32,
      iterations: this.iterations
    });

    const decrypted = CryptoJS.AES.decrypt(encrypted, key, {
      iv: iv,
      padding: CryptoJS.pad.Pkcs7,
      mode: CryptoJS.mode.CBC
    });
    return decrypted.toString(CryptoJS.enc.Utf8);
  }
}
*/