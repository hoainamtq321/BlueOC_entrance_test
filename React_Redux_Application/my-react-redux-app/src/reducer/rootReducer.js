import { combineReducers } from 'redux';
import postReducer from './slices/postSlice'; // thêm dòng này

const rootReducer = combineReducers({
  posts: postReducer, // gắn reducer mới
});

export default rootReducer;