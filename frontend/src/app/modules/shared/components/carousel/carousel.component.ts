import {
  Component,
  OnInit
} from '@angular/core';
import {
  NgbCarouselConfig
} from '@ng-bootstrap/ng-bootstrap';
@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.scss']
})
export class CarouselComponent implements OnInit {
  ngOnInit() {

  }
  title = 'ngSlick';


  slides = [{
      img: "https://www.solodev.com/assets/carousel/image1.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image2.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image3.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image4.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image5.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image6.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image7.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image8.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image8.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image1.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image1.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image1.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image4.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image5.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image6.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image7.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image8.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image8.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image1.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image1.png"
    },
    {
      img: "https://www.solodev.com/assets/carousel/image1.png"
    }
  ];

  slideConfig = {
    slidesToShow: 4,
    slidesToScroll: 2,
    dots: false,
    infinite: true,
    autoplay: true,
    draggable: true,
    autoplaySpeed: 3000,
    responsive: [{
      breakpoint: 1920,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 3,
        infinite: false,
        dots: false
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 2,
        infinite: false,
        dots: false
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 1
      }
    }]
  };


}