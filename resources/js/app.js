import './bootstrap';
import $ from "jquery";
import 'swiper'
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';

window.$ = window.jQuery = $
window.Swiper = Swiper
Swiper.use([Navigation, Pagination]);


