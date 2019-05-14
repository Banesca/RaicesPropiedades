import { Component, Input } from '@angular/core';
import { NgbActiveModal, NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { AuthService  } from 'src/app/servicios/servicios.index';

@Component({
  selector: 'login-modal',
  template: `
    <div class="container">
    <div class="row">
      <div class="col-6 px-0 d-none d-lg-block">
        <div class="card img-login">
          <img class="img-fluid" src="../../../assets/img/login-image.png" alt="Card image">
          <div class="card-img-overlay">
            <h1 class="card-title text-white">Smart Devs</h1>
            <h4 class="text-white">Solution With Code</h4>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6  login-container ">
        <div class="d-flex justify-content-center pt-3
              align-items-center">
          <img src="../../../assets/img/Iconos-Header/Logo.svg" style="width: 7rem;" alt="">
        </div>
        <h5 class="text-white pt-1 text-center">Registrar</h5>
        <div class="d-flex justiy-content-center"><small class="text-white text-center container">Para dejar tu
            comentario tienes que logearte.</small></div>
        <div class="container buttons-container">
          <button (click)="tryFacebookLogin()"
            class="facebook px-5 px-lg-4  btn btn-lg btn-block btn-primary my-3 d-flex align-items-center justify-content-around">
            <img src="../../../assets/img/social-button-facebook.png" style="width: 2rem;" alt=""> Ingresar con
            Facebook
          </button>
          <button (click)="tryGoogleLogin()"
            class="twitter px-5 px-lg-4  btn btn-lg btn-block btn-primary my-3 d-flex align-items-center justify-content-around">
            <img src="../../../assets/img/social-button-twitter.png" style="width: 2.2rem;" alt="">Ingresar con
            Twitter
          </button>
          <button (click)="closeModal()"
            class="github px-5 px-lg-4  btn btn-lg btn-block btn-primary my-3 d-flex align-items-center justify-content-around">
            <img src="../../../assets/img/social-button-github.png" style="width: 2.2rem;" alt="">Ingresar con
            Github
          </button>
        </div>
        <div class="d-flex justiy-content-center"><small class="text-white text-center container">Al hacer clic,
            aceptas los Términos y Condiciones de uso y Políticas</small></div>
        <h4 class="text-white text-center py-2">Bienvenid@s</h4>
      </div>
    </div>
  `
})
export class LoginModal {
  @Input() name;
  Usuario;

  constructor(public activeModal: NgbActiveModal,
    private authService:AuthService
    ) {
      this.Usuario=this.authService.verificasession();
      console.log(this.Usuario)
    }

    closeModal() {
      this.activeModal.close('click');
   }
   

    tryGoogleLogin(){
      this.authService.doGoogleLogin()
      .then(res => {
        this.closeModal()
      })
    }
    
    tryFacebookLogin(){
      this.authService.doFacebookLogin()
      .then(res => {
        this.closeModal()
      })
    }
}

@Component({
  selector: 'app-send-comment',
  templateUrl: './send-comment.component.html',
  styleUrls: ['./send-comment.component.scss']
})
export class SendCommentComponent{

  constructor(
    private modalService: NgbModal
  ) { }

  open() {
    const modalRef = this.modalService.open(LoginModal, { size: 'lg' });
    modalRef.componentInstance.name = 'World';
  }






}
