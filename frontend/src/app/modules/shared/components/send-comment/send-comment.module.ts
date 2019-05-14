import { NgModule } from '@angular/core';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { SendCommentComponent, LoginModal } from './send-comment.component';

@NgModule({
  imports: [NgbModule],
  declarations: [SendCommentComponent, LoginModal],
  exports: [SendCommentComponent],
  bootstrap: [SendCommentComponent],
  entryComponents: [LoginModal]
})
export class SendCommentModule {}
