#!/bin/sh

# Thanks Gittip https://github.com/gittip/www.gittip.com

# Fail on error.
# ==============

set -e


# Be somewhere predictable.
# =========================

cd "`dirname $0`"


# --help
# ======

if [ $# = 0 ]; then
    echo
    echo "Usage: $0 <version>"
    echo
    echo "  This is a release script for Storage."
    echo
    exit
fi


# Helpers
# =======

confirm () {
    proceed=""
    while [ "$proceed" != "y" ]; do
        read -p"$1 (y/N) " proceed
        if [ "$proceed" == "n" -o "$proceed" == "N" -o "$proceed" == "" ]
        then
            return 1
        fi
    done
    return 0
}

require () {
    if [ ! `which $1` ]; then
        echo "The '$1' command was not found."
        return 1
    fi
    return 0
}


# Work
# ====

if [ $1 ]; then

    require git
    if [ $? -eq 1 ]; then
        exit
    fi

    if [ "`git tag | grep '^$1$'`" ]; then
        echo "Version $1 is already git tagged."
    else
        confirm "Tag and push version $1?"
        if [ $? -eq 0 ]; then

            # Create the release branch
            # =========================
            git checkout -b release-$1 develop

            # Bump the version.
            # =================
            sed -i 's/v[0-9\.]\+/v$1/' readme.md
            git commit readme.md -m "Bumped version to $1"

            # Finish the release
            # ==================
            git checkout master
            git merge --no-ff release-$1

            git tag -a $1

            # Mirror to develop
            # =================
            git checkout develop
            git merge --no-ff release-$1

            # Push to GitHub.
            # ===============
            # This will break if we didn't pull before releasing. We should do
            # that.

            git push
            git push --tags

            # Delete Branch
            # =============
            git branch -d release-$1

        fi
    fi
fi
