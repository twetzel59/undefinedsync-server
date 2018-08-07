# undefinedsync-server
Central control server for the Minecraft server sync app

This is to handle version control for this application: https://github.com/twetzel59/undefinedsync.

## How it works

First, see my repo linked above, or this will make little sense :)
The Sync app has a rather unusual articecture. The central server is being hosted on 000webhost, because it is lightweight and free. However, they do not allow using their service to share large files...

In order to distribute the server's worlds and config files, I rely on users installing the Google Drive client. It's great for syncing the large files, and runs in the background relatively seamlessly. We also then have all the benefits of Google Drive, including extensive versioning history, sharingm and industry standard security.

Simply sharing the files through Google Drive isn't enough though. If it were that simple, the linked client could be as simple as a zip/unzip utility to save space on Google Drive, if it were to be necessary at all. Of course, I decided to complicate the situation by deciding that Sync should allow for **multiple** potential users to use the server and make edits locally. Now, some form of locking is needed. Otherwise, multiple players could work on the server in parallel unknowingly. I would then have to discard someone's work.

I first investigated a merging solution, very much like branches in Git. Sadly, merging doesn't work easily with Minecraft worlds, so another possibility was to allow each user one "offline world" that only he/she could edit offline. Yet, the Spigot plugins have server wide configuration files that would get invalidated if this were done.

So, I decided to create a central server on 000webhost to manage only the **locking** mechanism to prohibit concurrent edits from different users.

This repository contains a small PHP project to manage the locking process.

# Server versioning protocol
When Sync starts, it first checks ``ping.php`` to see if the server is running the same version of Sync as the client.
Currently, the project is indev and the server must return
```
undefinedSync_proto0
```

for Sync to be happy.

## Errors

If the server encounters an error it replies
```
undefinedSync_error0;
```
with a human-readable error message concatenated (following the semicolon).

# Reuse

If this is of use to you, go ahead and use it. You could even use the Sync client and have this system for any kind of Minecraft server, game server, or server in general.

No credit or attribution is necessary for this server (it is released into the Public Domain). Keep in mind that as of the last update to this README, the client is GPL-3.0 licensed — only because of a font used in the logo and because Nimble as of writing has only a few license options :D

You can change and redistribute code (and binaries) for both the client and the server (see the client's repo for up-to-date and official licensing information).

And if someone actually uses this to make use of a previously-seemingly-unuseful OUYA console, I'll be overjoyed, LOL.

Happy Hacking!
