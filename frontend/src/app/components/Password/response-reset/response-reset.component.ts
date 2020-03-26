import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { JarwisService } from 'src/app/service/jarwis.service';
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-response-reset',
  templateUrl: './response-reset.component.html',
  styleUrls: ['./response-reset.component.css']
})
export class ResponseResetComponent implements OnInit {
  public error = [];
  public form = {
    email: null,
    password: null,
    password_confirmation: null,
    resetToken: null
  }
  constructor(
    private route: ActivatedRoute,
    private Jarwis: JarwisService,
    private router: Router,
    private tostr: ToastrService
  ) {
    route.queryParams.subscribe(params => {
      this.form.resetToken = params['token']
    });
  }

  onSubmit() {
    this.Jarwis.changePassword(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    )
  }
  handleResponse(data) {


    this.tostr.success('Done!, Now login with new Password');
    this.router.navigateByUrl('/login');



  }

  handleError(error) {
    this.error = error.error.errors;
  }
  ngOnInit() {
  }
}
