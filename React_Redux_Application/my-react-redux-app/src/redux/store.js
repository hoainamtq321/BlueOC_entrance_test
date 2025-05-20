import { configureStore } from '@reduxjs/toolkit';
import rootReducer from '../reducer/rootReducer';

const store = configureStore({
  reducer: rootReducer,
});

export default store;

// câu lệnh trên tương tự
/*
import { createStore } from 'redux';
import rootReducer from './rootReducer';

    const store = createStore(rootReducer);
    export default store;

*/