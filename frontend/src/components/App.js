import React from "react";
import ReactDOM from "react-dom";

const App = () => {
  return (
    <div class="flex h-screen">
      <div class="m-auto">
        <h1 class="text-4xl font-light text-gray-900 dark:text-white">Voci</h1>
      </div>
    </div>
  );
};

ReactDOM.render(<App />, document.getElementById("app"));
