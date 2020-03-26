import { Component, OnInit } from '@angular/core';
import { JarwisService } from 'src/app/service/jarwis.service';
import { ToastrService } from 'ngx-toastr';
import { Router } from '@angular/router';

@Component({
  selector: 'app-request-reset',
  templateUrl: './request-reset.component.html',
  styleUrls: ['./request-reset.component.css']
})
export class RequestResetComponent implements OnInit {
  form = {
    email: null,

  };

  constructor(
    private Jarwis: JarwisService,
    private router: Router,
    private toastr: ToastrService
  ) { }

  ngOnInit() {

  }

  onSubmit() {
    this.Jarwis.sendPasswordResetLink(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.toastr.error(error.error.error)
    );
  }

  handleResponse(res) {
    this.toastr.success(res.data, 'Mail Sent On Your Email');
    this.form.email = null;
  }



}
