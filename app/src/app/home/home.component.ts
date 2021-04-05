import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  imageMusee = '';
  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    this.apiService.getImageMusee().subscribe(data => {
      this.imageMusee = data;
    }, error => {
      console.log('error: ', error);
    });
  }

}
