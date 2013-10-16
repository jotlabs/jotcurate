
all: test clean

test:
	@phpunit tests/

clean:
	@rm -rf tmp/*


