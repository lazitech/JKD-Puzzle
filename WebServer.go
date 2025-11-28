package main

import "net/http"
import "fmt"
func main() {
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		http.ServeFile(w, r, r.URL.Path[1:])
	})
	err := http.ListenAndServe(":8082", nil)
	fmt.Println(err)
}
