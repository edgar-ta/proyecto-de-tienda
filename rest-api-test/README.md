# Readme

The concept is good as it is right now, but we can improve it
by generalizing it; making a variable that holds objects of
the form:

```ts
{
    action: string,
    lastFetched: any,
    fetchingDone: boolean
}
```

Then some function that calls the server passing the action and last fetched
variable as arguments; takes the response (consisting of a new value
for last fetched, fetching done, and the actual object of interest) and updates
the object

## What I (Re-)Learned

I re-learned how to build urls using the built-in JavaScript classes `URL` and `URLSearchParams`

I learned how to respond with JSON objects from the server (create some sort of REST API)

I also learned that you can close the connection once you have fetched the values (seems kinda
trivial now that I write it down, but I tried it first and it didn't work; because I was
passing the query result, and whenever I tried to fetch something once the connection was closed
I got an error).

Also, surprinsingly this interaction with php was easer than any other I have had before; even
enjoyable, I believe I might get used to this thing of working hand in hand with the backend
